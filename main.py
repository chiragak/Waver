# Attendance recording test
#import libraries
import time
import datetime
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
sign_in=0
sign_out=1
try:
    while True:
        lcd.clear()
        lcd.message="Place card to\nsave attendance"
        id,text=reader.read()
        ts=time.time()
        timestamp=datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H-%M-%S')
        cursor.execute("Select id, name FROM users WHERE rfid_uid="+str(id))
        result = cursor.fetchone()
        
        lcd.clear()
        if cursor.rowcount >= 1:
            cursor.execute("Select user_id FROM attendance WHERE total_time_daily='00:00:00' AND user_id=%s",(result[0],))
            cursor.fetchone()
            if cursor.rowcount < 0:
                time.sleep(2)
                cursor.execute("INSERT INTO attendance (user_id) VALUES (%s)", (result[0],) )
                lcd.message="Logged In"
                time.sleep(2)
                lcd.message="Welcome\n" + result[1]
            else:
                time.sleep(2)
                cursor.execute("UPDATE attendance SET clock_out= %s where user_id=%s AND total_time_daily='00:00:00'",(timestamp,result[0],))
                lcd.message="Logged out"
                time.sleep(2)
                lcd.message="Thank You\n"+result[1]
            cursor.execute("UPDATE attendance SET total_time_daily=TIME(TIMEDIFF(clock_out,clock_in)) WHERE user_id=%s",(result[0],))
            db.commit()
            
        else:
            lcd.message="Welcome to\n Cybersecurity"
            time.sleep(2)
            lcd.clear()
            lcd.message="uff..."
            time.sleep(2)
            lcd.message="your Rfid number\n is="+str(id)
            time.sleep(3)
            lcd.clear()
            lcd.message="This User\n Does not exist"
            time.sleep(2)
            lcd.clear()
            lcd.message="Please contact\n admin"
            time.sleep(2)
            lcd.clear()
            lcd.message="Have a good day"
            time.sleep(2)
            lcd.clear()
        time.sleep(2)
    
    
finally:
    GPIO.cleanup()
     
