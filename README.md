# second-task
KY-013 ANALOG TEMPERATURE SENSOR MODULE

KY-013 SPECIFICATIONS

Operating Voltage 5V Temperature measurement range -55°C to 125°C [-67°F to 257°F] Measurement Accuracy ±0.5°C

  Source code int ThermistorPin = A0; int Vo; float R1 = 10000; // value of R1 on board float logR2, R2, T; float c1 = 0.001129148, c2 = 0.000234125, c3 = 0.0000000876741; //steinhart-hart coeficients for thermistor void setup() { Serial.begin(9600); } void loop() { Vo = analogRead(ThermistorPin); R2 = R1 * (1023.0 / (float)Vo - 1.0); //calculate resistance on thermistor logR2 = log(R2); T = (1.0 / (c1 + c2logR2 + c3logR2logR2logR2)); // temperature in Kelvin T = T - 273.15; //convert Kelvin to Celcius // T = (T * 9.0)/ 5.0 + 32.0; //convert Celcius to Farenheit Serial.print("Temperature: "); Serial.print(T); Serial.println(" C"); delay(500); }

  Source code

// First we include the libraries #include <OneWire.h> #include <DallasTemperature.h>

// Data wire is plugged into pin 2 on the Arduino #define ONE_WIRE_BUS 2

// Setup a oneWire instance to communicate with any OneWire devices
// (not just Maxim/Dallas temperature ICs) OneWire oneWire(ONE_WIRE_BUS);

// Pass our oneWire reference to Dallas Temperature. DallasTemperature sensors(&oneWire);

void setup(void) { // start serial port Serial.begin(9600); Serial.println("Dallas Temperature IC Control Library Demo"); // Start up the library sensors.begin(); } void loop(void) { // call sensors.requestTemperatures() to issue a global temperature // request to all devices on the bus

Serial.print(" Requesting temperatures..."); sensors.requestTemperatures(); // Send the command to get temperature readings Serial.println("DONE");

Serial.print("Temperature is: "); Serial.print(sensors.getTempCByIndex(0)); // Why "byIndex"?
// You can have more than one DS18B20 on the same bus.
// 0 refers to the first IC on the wire delay(1000); }
