#!/usr/bin/env python.

import time
import RPi.GPIO as GPIO
from mfrc522 import SimpleMFRC522
import mysql.connector
import board
import digitalio
import adafruit_character_lcd.character_lcd as characterlcd

db = mysql.connector.connect(
  host="localhost",
  user="attendanceadmin",
  passwd="pimylifeup",
  database="attendancesystem"
)

cursor = db.cursor()
reader = SimpleMFRC522()
lcd_columns = 16
lcd_rows = 2

# Raspberry Pi Pin Config:
lcd_rs = digitalio.DigitalInOut(board.D26)
lcd_en = digitalio.DigitalInOut(board.D19)
lcd_d7 = digitalio.DigitalInOut(board.D27)
lcd_d6 = digitalio.DigitalInOut(board.D22)
lcd_d5 = digitalio.DigitalInOut(board.D24)
lcd_d4 = digitalio.DigitalInOut(board.D23)
lcd_backlight = digitalio.DigitalInOut(board.D4)

# Initialise the lcd class
lcd = characterlcd.Character_LCD_Mono(
    lcd_rs, lcd_en, lcd_d4, lcd_d5, lcd_d6, lcd_d7, lcd_columns, lcd_rows, lcd_backlight
)

try:
  while True:
    lcd.clear()
    lcd.message='Place Card to\nregister'
    id, text = reader.read()
    cursor.execute("SELECT id FROM users WHERE rfid_uid="+str(id))
    cursor.fetchone()

    if cursor.rowcount >= 1:
      lcd.clear()
      lcd.message="Overwrite\nexisting user?"
      overwrite = input("Overwite (Y/N)? ")
      if overwrite[0] == 'Y' or overwrite[0] == 'y':
        lcd.clear()
        lcd.message="Overwriting user."
        time.sleep(1)
        sql_insert = "UPDATE users SET name = %s, user_email=%s WHERE rfid_uid=%s"
      else:
        continue;
    else:
      sql_insert = "INSERT INTO users (name, user_email,rfid_uid) VALUES (%s,%s, %s)"
      lcd.clear()
    lcd.message='Enter new name\nand email id'
    new_name = input("Name: ")
    user_email= input("Email: ")

    cursor.execute(sql_insert, (new_name,user_email, id))

    db.commit()

    lcd.clear()
    lcd.message="User " + new_name + "\nSaved"
    time.sleep(2)
finally:
    GPIO.cleanup()
