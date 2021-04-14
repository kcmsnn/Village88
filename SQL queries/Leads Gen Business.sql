#1. What query would you run to get the total revenue for March of 2012?
SELECT MONTHNAME(charged_datetime) AS Month, SUM(amount) AS amount FROM billing
WHERE charged_datetime >= '2012-03-01 00:00:00' AND charged_datetime <= '2012-03-31 23:59:59'
GROUP BY Month;

#2. What query would you run to get total revenue collected from the client with an id of 2?
SELECT billing.client_id, SUM(amount) AS total_revenue from clients
LEFT JOIN billing ON clients.client_id = billing.client_id
WHERE billing.client_id = '2'
GROUP BY client_id;

#3. What query would you run to get all the sites that client=10 owns?
SELECT sites.domain_name AS Websites, clients.client_id AS client_id from clients
LEFT JOIN sites ON clients.client_id = sites.client_id
WHERE clients.client_id = '10';

#4. What query would you run to get total # of sites created per month per year for the client with an id of 1? What about for client=20?
SELECT client_id, COUNT(domain_name) AS number_of_websites, MONTHNAME(created_datetime) AS month_created, YEAR(created_datetime) AS year_created
FROM sites
WHERE client_id = '1' #'20'
GROUP BY created_datetime;

#5. What query would you run to get the total # of leads generated for each of the sites between January 1, 2011 to February 15, 2011?
SELECT domain_name AS websites, COUNT(leads_id) AS number_of_leads, date_format(registered_datetime, '%M %d, %Y') AS date_generated 
FROM leads
LEFT JOIN sites ON leads.site_id = sites.site_id
WHERE registered_datetime >= '2011-01-01 00:00:00' AND registered_datetime <= '2011-02-28 23:59:59'
GROUP BY date_generated;

#6. What query would you run to get a list of client names and the total # of leads we've generated for each of our clients between January 1, 2011 to December 31, 2011?
SELECT CONCAT(clients.first_name, ' ', clients.last_name)  AS client_name, COUNT(leads_id) as number_of_leads FROM leads
LEFT JOIN sites ON sites.site_id = leads.site_id
LEFT JOIN clients ON clients.client_id = sites.client_id
WHERE registered_datetime >= '2011-01-01 00:00:00' AND registered_datetime <= '2011-12-31 23:59:59'
GROUP BY client_name
ORDER BY clients.client_id;

#7. What query would you run to get a list of client names and the total # of leads we've generated for each client each month between months 1 - 6 of Year 2011?
SELECT CONCAT(clients.first_name, ' ', clients.last_name)  AS client_name, 
	COUNT(leads_id) AS number_of_leads, 
	date_format(registered_datetime, '%M') AS month_generated 
    FROM leads
LEFT JOIN sites ON sites.site_id = leads.site_id
LEFT JOIN clients ON clients.client_id = sites.client_id
WHERE registered_datetime >= '2011-01-01 00:00:00' AND registered_datetime <= '2011-06-30 23:59:59'
GROUP BY sites.created_datetime
ORDER BY DATE_FORMAT(sites.created_datetime, '%M') AND clients.client_id;

#8. What query would you run to get a list of client names and the total # of leads we've generated for each of our clients' sites
#	between January 1, 2011 to December 31, 2011? Order this query by client id.
#	Come up with a second query that shows all the clients, the site name(s), and the total number of leads generated from each site for all time.
SELECT CONCAT(clients.first_name, ' ', clients.last_name)  AS client_name, 
		domain_name AS websites,
        COUNT(leads_id) AS number_of_leads,
        date_format(registered_datetime, '%M %d %Y') AS date_generated
FROM clients
LEFT JOIN sites ON clients.client_id = sites.client_id
LEFT JOIN leads ON sites.site_id = leads.site_id
WHERE registered_datetime >= '2011-01-01 00:00:00' AND registered_datetime <= '2011-12-31 23:59:59'
GROUP BY websites
ORDER BY clients.client_id, sites.site_id;

#ALL TIME

SELECT CONCAT(clients.first_name, ' ', clients.last_name)  AS client_name, 
		domain_name AS websites,
        COUNT(leads_id) AS number_of_leads
FROM clients
LEFT JOIN sites ON clients.client_id = sites.client_id
LEFT JOIN leads ON sites.site_id = leads.site_id
GROUP BY websites
ORDER BY clients.client_id, sites.site_id;

#9. Write a single query that retrieves total revenue collected from each client for each month of the year. Order it by client id.
SELECT CONCAT(clients.first_name, ' ', clients.last_name)  AS client_name,
		SUM(amount) AS total_revenue,
        DATE_FORMAT(charged_datetime, '%M') AS month_charge,
        DATE_FORMAT(charged_datetime, '%Y') AS year_charge
FROM clients
RIGHT JOIN billing ON clients.client_id = billing.client_id
GROUP BY billing.client_id, month_charge, year_charge
ORDER BY billing.client_id, charged_datetime;

#10. Write a single query that retrieves all the sites that each client owns. 
#Group the results so that each row shows a new client. 
#It will become clearer when you add a new field called 'sites' that has all the sites that the client owns. (HINT: use GROUP_CONCAT)
SELECT CONCAT(clients.first_name, ' ', clients.last_name)  AS client_name, GROUP_CONCAT(sites.domain_name SEPARATOR ' / ') AS sites FROM clients
RIGHT JOIN sites ON clients.client_id = sites.client_id
GROUP BY sites.client_id