
# CakePHP Card Distribution Application

This is a simple CakePHP application that distributes a standard deck of 52 playing cards to a specified number of people. The application is containerized using Docker for easy setup and deployment.

---

## **Table of Contents**
1. [Prerequisites](#prerequisites)
2. [Setup](#setup)
   - [Clone the Repository](#clone-the-repository)
   - [Docker Setup](#docker-setup)
   - [Access the Application](#access-the-application)
3. [Usage](#usage)
   - [Distribute Cards](#distribute-cards)
   - [Test the Application](#test-the-application)
4. [Project Structure](#project-structure)
5. [Troubleshooting](#troubleshooting)

---

## **Prerequisites**

Before you begin, ensure you have the following installed on your system:
- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Git](https://git-scm.com/downloads)

---

## **Setup**

### **Clone the Repository**

1. Clone this repository to your local machine:

   ```bash
   git clone git@github.com:rizaini/tyrell_question_a_framework.git
   cd tyrell_question_a_framework
   ```

### **Docker Setup**

1. Run the following command to build and start the Docker containers :
	```
	docker-compose up -d
	```
	This will:
	-   Start a PHP-FPM container (`cakephp_php`).
	-   Start an Nginx container (`cakephp_web`) to serve the application.
	-   Map port  `8080`  on your local machine to port  `80`  in the Nginx container.
	
2. Verify the Containers (Check that the containers are running) :
	```
	docker-compose ps	
	```
	You should see two services: `cakephp_web` and `cakephp_php`.

### **Access the Application**
1. Open your browser and navigate to:

	```
	http://localhost:8080/
	```
2.  You should see a form asking for the number of people. Enter a number and click "Distribute Cards."

## **Usage**

### **Distribute Cards**

1.  **Enter the Number of People**:
    
    -   On the homepage (`http://localhost:8080/`), enter the number of people in the input field.
        
    -   Click "Distribute Cards."
        
2.  **View the Distributed Cards**:
    
    -   The application will display the distributed cards for each person in the format:
    ```
    Person 1: S-A, H-2, D-3, ...
	Person 2: H-A, D-2, C-3, ...
	```
### **Test the Application**

1.  **Test with Valid Input**:
    
    -   Enter a valid number (e.g.,  `4`) and ensure the cards are distributed correctly.
        
2.  **Test with Invalid Input**:
    
    -   Enter an invalid value (e.g.,  `-1`  or  `abc`) and ensure the application displays an error message:
     -  Input value does not exist or value is invalid
        
3.  **Test with No Input**:
    -   Access the application without providing the  `people`  parameter (e.g.,  `http://localhost:8080/`). The application will default to distributing cards to  `4`  people.

## **Project Structure**
The project structure is as follows:

	
	├── docker
	│   └── nginx.conf          # Nginx configuration file
	├── docker-compose.yml      # Docker Compose configuration
	├── Dockerfile              # PHP-FPM Dockerfile
	├── src
	│   └── Controller
	│       └── CardsController.php # Controller for card distribution
	├── templates
	│   └── Cards
	│       ├── distribute.php  # View for displaying distributed cards
	│       └── form.php        # View for collecting the number of people
	├── config
	│   ├── app.php             # CakePHP application configuration
	│   └── routes.php          # Route configuration
	├── vendor                  # Composer dependencies
	├── webroot                 # Public assets
	└── README.md               # This file

## **Troubleshooting**

### **Common Issues**

1.  **Application Not Accessible**:
    
    -   Ensure the Docker containers are running:
```docker-compose ps```
    
    
    -   Check the logs for errors:
		```
		docker logs cakephp_php
        docker logs cakephp_web
        ```
        
2.  **Missing PHP Extensions**:
    
    -   If you encounter errors related to missing PHP extensions (e.g.,  `intl`), ensure the  `Dockerfile`  installs the required extensions.
        
3.  **CakePHP Cache Issues**:
    
    -   Clear the CakePHP cache:
        ```docker exec -it cakephp_php bin/cake cache clear_all```