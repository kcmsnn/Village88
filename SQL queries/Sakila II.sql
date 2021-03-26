#1. Get all the list of customers.
SELECT * FROM customer;
SELECT * FROM address;
SELECT * FROM city;

#2. Get all the list of customers as well as their address.
SELECT CONCAT(first_name,' ',last_name) AS customer_name, address.address FROM customer
LEFT JOIN address ON customer.address_id = address.address_id;

#3. Get all the list of customers as well as their address and the city name.
SELECT CONCAT(first_name,' ',last_name) AS customer_name, address.address, city.city FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id ;

#4. Get all the list of customers as well as their address, city name, and the country.
SELECT CONCAT(first_name,' ',last_name) AS customer_name, address.address, city.city, country.country FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id ;

#5. Get all the list of customers who live in Bolivia
SELECT CONCAT(first_name,' ',last_name) AS customer_name, address.address, city.city, country.country FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id 
WHERE country.country = 'Bolivia';

#6. Get all the list of customers who live in Bolivia, Germany and Greece
SELECT CONCAT(first_name,' ',last_name) AS customer_name, address.address, city.city, country.country FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id 
WHERE country.country = 'Bolivia' OR country.country ='Germany' OR country.country ='Greece';

#7. Get all the list of customers who live in the city of Baku.
SELECT CONCAT(first_name,' ',last_name) AS customer_name, address.address, city.city, country.country FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id 
WHERE city.city = 'Baku';

#8. Get all the list of customers who live in the city of Baku, Beira, and Bergamo.
SELECT CONCAT(first_name,' ',last_name) AS customer_name, address.address, city.city, country.country FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id 
WHERE city.city = 'Baku' OR city.city = 'Beira' OR city.city = 'Bergamo';

#9. Get all the list of customers who live in a country where the country name's length is less than 5.  
#	Show the customer with the longest full name first.  (Hint:  Look into how you can concatenate a string in SQL).
SELECT CONCAT(first_name,' ',last_name) AS customer_name, city.city, country.country, LENGTH(country.country) AS country_name_length FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id 
WHERE LENGTH(country.country) < 5
ORDER BY LENGTH(customer_name) DESC;

#10. Get all the list of customers who live in a city name whose length is more than 10.  
#	 Order the result so that the customers who live in the same country are shown together.
SELECT CONCAT(first_name,' ',last_name) AS customer_name, country.country, city.city, LENGTH(city.city) AS city_name_length FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id 
WHERE LENGTH(city.city) > 10
ORDER BY country.country ASC;

#11. Get all the list of customers who live in a city where the city name includes the word 'ba'.  
#	 For example Arratuba or Baiyin  should show up in your result.
SELECT CONCAT(first_name,' ',last_name) AS customer_name, city.city FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id 
WHERE city.city LIKE '%ba%';

#12. Get all the list of customers where the city name includes a space.  
#	 Order the result so that customers who live in the longest city are shown first.
SELECT CONCAT(first_name,' ',last_name) AS customer_name, city.city, LENGTH(city.city) AS city_name_length FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id
ORDER BY city_name_length DESC;

#13. Get all the customers where the country name is longer than the city name.
SELECT CONCAT(first_name,' ',last_name) AS customer_name,city.city, country.country, LENGTH(city.city) AS city_name_length, LENGTH(country.country) AS country_name_length FROM customer
LEFT JOIN address ON customer.address_id = address.address_id
LEFT JOIN city ON address.city_id = city.city_id 
LEFT JOIN country ON city.country_id = country.country_id 
WHERE LENGTH(country.country) > LENGTH(city.city);