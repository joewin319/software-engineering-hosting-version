# AppointmentBookingSystem
An Online Appointment Booking System from AlphaDevX

Problem definintion 

Covid-19 Pandemic and the new norm
The population in Malaysia is growing rapidly, which is estimated to be 32.7 million in 2021. However, since the Covid-19 pandemic, the Malaysian government has enforced social distancing measures to its citizens and eventually became a new norm. However, from our observation, there are still a lot of people who face the difficulty to avoid crowded places since they were not aware of the peak hours and the number of people in a particular location at that time. Hence, in order to minimize the risk of getting infected of Covid-19 virus, people tend to go to places which are not crowded instead. This precaution is pivotal in preventing potential clusters. Additionally, people could also skip the hassle of queuing for a long period of time because it is unnecessary, inefficient and a waste of time.

**Product Scope** 

In order to prevent this issue, AlphaDevX will develop an appointment web application that will allow users to reserve a desired time slot. Registration form will provide various time slots for the users to book an appointment for the particular service i.e to access a gym, to access a grocery store. The requested time slot will be checked with our database to ensure that the number of people during that time is within a certain limit. The user will be allocated an appointment slot in the case that the number of people is within the threshold set. If it crosses a certain limit on the number of people, then the booking of the appointment will be cancelled. After that, the user will be recommended several slots that they can choose to go on the same day. 

**Overall Description:** 

**Product Perspective** 

There is several online appointment scheduling tools in the marketplace, some of which are feature-loaded, easy to setup and cheap. For doctors, online appointment scheduling brings a lot of value add services and benefits, like engaging the patient, making the patient feel appreciated, and being able to store patients’ data securely for future reference. But the most wonderful and useful advantage is that online appointment scheduling is amazingly low cost. 

**Product Functions** 

Online appointment system with the key features listed below:-  
 
**For patients:** 

-Register as an patient account 

-Booking an appointment 

-Cancelling an appointment 

-See their booking status 

-See doctor availability 

-Search clinic and doctor 

**For Manager:** 

-Update status of appointments 

-See appointment list 

**For Admin:** 

-Add doctor/clinic/manager in database 

-Delete doctor/clinic/manager from database 

-Show all doctors/clinic/manager 

-Assign doctor to a clinic 

-Assign Manager to a clinic 
 
**Technologies used:** 

-HTML 5 

-CSS3 

-PHP 

-JavaScript 

-SQL 

-jQuery 

**Software Requirement:** 

-Php server like (XAMPP, WAMP) etc. 

-MySQL for database 

-Web Browser supporting HTML5 : Google Chrome(recommended) / Firefox  

**Step-wise Instructions:**

1. Open the wt_database.sql file given in the zip folder. 

2. Import it to the wamp/xampp folder (database name: wt1_database)

3.  The opening file for the website is the cover.php file. 

4. Admin login and manager login can be done through the same page. Login credentials: User Username Password Admin admin admin Patient user user Manager manager manager 

5. User sign up option is also available at the main page i.e. cover.php 

6. Log out will directly redirect the user to the main page. 

7. dbconfig.php contains the data for the connection of the localhost to the database of phpmyadmin. Login credentials for phpmyadmin can be restructured there as well. 
