/*wiring the MFRC522 to ESP8266 (ESP-12) tested was ok
 
 SDA(SS) = GPIO2 (D4)
 
 RST    = GPIO5 (D1)
 
 MOSI   = GPIO13 (D7)
 
 MISO    = GPIO12 (D6)
 
 SCK    = GPIO   (D5)
 
 GND   = GND
 
 3.3V  = 3.3V
 */
 
#include<Arduino.h> 

#include<ESP8266WiFi.h>

#include<ESP8266WiFiMulti.h>

#include<ESP8266HTTPClient.h>

#include<SPI.h>

#include<MFRC522.h>

#define SS_PIN 2 //GIO2 (D4)

#define RST_PIN 5 //GIO5 (D1)

#define USE_SERIAL Serial

MFRC522 mfrc522(SS_PIN,RST_PIN); //Create MFRC522 instance

IPAddress ip(192,168,0,55); // ip address

IPAddress subnet(255,255,255,0); // Subnet

IPAddress gateway(192,168,0,1); //gateway

int LedPin=4;

void setup()
{
  WiFi.mode(WIFI_STA);
  
  WiFi.config(ip,subnet,gateway);  //config wifi
  
  WiFi.begin("RFID","123456789");
  
  delay(1000);
  
  USE_SERIAL.begin(9600);
  
  SPI.begin();  //Initiate SPI bus
  
  Serial.begin(9600);  //Initiate a serial communication
  
  mfrc522.PCD_Init();  //Initiate MFRC522
  
  delay(100);
  
  Serial.println("WiFi conectting...");
  
  Serial.println();
  
  pinMode(LedPin,OUTPUT);
  
  pinMode(LedPin,0);
}

 void loop()
 
 {
  
  digitalWrite(LedPin,0);
  
  //Look for new cards
  
  if (!mfrc522.PICC_IsNewCardPresent())  //มีแตะบัตรเข้ามาใหม่ไหม
  
  {
    
    return;
    
  }
  
 if(!mfrc522.PICC_ReadCardSerial())  //RFID tag reader ส่งข้อมูลบัครไปทาง SPI
 
  {
    
    return;
    
  }
  
 //Show UID on serial monitor
 
 Serial.print("UID tag:");
 
 String content="";
 
 byte letter;
 
 for(byte i=0;i<mfrc522.uid.size;i++)
 
  {
    Serial.print(mfrc522.uid.uidByte[i]<0x10?"0":"");
    
    Serial.print(mfrc522.uid.uidByte[i],HEX);
    content.concat(String(mfrc522.uid.uidByte[i]<0x10?"0":""));  //ต่อรหัส RFID แต่ละ Byte
    
    content.concat(String(mfrc522.uid.uidByte[i],HEX));  //ต่อรหัส RFID แต่ละ Byte
    
  }
  
 content.toUpperCase();
 
 digitalWrite(LedPin,1);
 
 Serial.println();
 
 Serial.print("RFID TAG:");
 

 if((WiFi.status()==WL_CONNECTED))
 
 {
  
  HTTPClient http;
  
  String url =  "http://192.168.0.102/Course/allregister.php?content="+String(content);  //url ที่จะส่งข้อมูล RFID เข้า server
  //String url =  "http://192.168.2.43:8080/Course/parent_register.php?content="+String(content);  //url ที่จะส่งข้อมูล RFID เข้า server
  
  Serial.println(url);
  
  http.begin(url);  //ส่งข้อมูลเข้า server
  
  USE_SERIAL.print("[HTTP]begin...\n");
  
  USE_SERIAL.print("[HTTP]GET...\n");
  
  //start connection and send HTTP header
  
  int httpCode=http.GET();
  
  //httpCode will be negating on error

 if(httpCode>0)
  
   {
    
    //HTTP header has been send and Server response header has been handled
    
    USE_SERIAL.printf("[HTTP]GET...code:%d\n",httpCode);
    
    //file found at server
    
   if(httpCode==HTTP_CODE_OK)
    
    {
      
      String payload = http.getString();
      
      USE_SERIAL.println(payload);
    }
    
  }else
   
    {
      
     USE_SERIAL.printf("[HTTP]    GET...  failed,   error:    %s\n", http.errorToString(httpCode).c_str());   //กรณีติดต่อ server ไม่ได้แจ้ง error
      
    }
    
      http.end();
      
     delay(500);
 }
 }
