#1. Get all the list of countries that are in the continent of Europe
SELECT * FROM country
WHERE Continent = 'Europe';

#2. Get all the list of countries that are in the continent of North America and Africa
SELECT * FROM country
WHERE Continent = 'North America' OR Continent = 'Africa';

#3. Get all the list of cities that are part of a country with population greater than 100 millions.
SELECT country.Code AS country_code, country.Name AS country_name, continent, city.District AS city FROM country
LEFT JOIN city ON country.Code = city.CountryCode
WHERE country.Population > 100000000;

#4. Get all the list of countries (display the full country name) who speak 'Spanish' as their language
SELECT country.Name AS country, Language, IsOfficial From countrylanguage
LEFT JOIN country ON country.Code = countrylanguage.CountryCode
WHERE countrylanguage.Language = 'Spanish';

#5. Get all the list of countries (display the full country name) who speak 'Spanish' as their official language
SELECT country.Name AS country, countrylanguage.Language, countrylanguage.IsOfficial From country
RIGHT JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
WHERE countrylanguage.Language = 'Spanish' AND countrylanguage.IsOfficial = 'T';

#6. Get all the list of countries (display the full country name) who speak either 'Spanish' or 'English' as their official language
SELECT Name AS country, countrylanguage.Language From country
RIGHT JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
WHERE countrylanguage.IsOfficial = 'T' AND countrylanguage.Language = 'English' OR countrylanguage.IsOfficial = 'T' AND countrylanguage.Language = 'Spanish' ;

#7. Get all the list of countries (display the full country name) where 'Arabic' is spoken by more than 30% of the population
#	but where it's not the country's official language.
SELECT Name AS country, countrylanguage.Language, countrylanguage.Percentage From country
RIGHT JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
WHERE countrylanguage.IsOfficial = 'F' AND countrylanguage.Language = 'Arabic' AND countrylanguage.Percentage > 30 ;


#8. Get all the list of countries (display the full country name) where 'French' is the official language but where 
#	less than 50% of the population in that country actually speaks that language.
SELECT Name AS country, countrylanguage.Language, countrylanguage.IsOfficial, countrylanguage.Percentage From country
RIGHT JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
WHERE countrylanguage.IsOfficial = 'T' AND countrylanguage.Language = 'French' AND countrylanguage.Percentage < 50 ;

#9. Get all the list of countries (display the full country name and the full language name) and their official language.  
#	Order the result so that those with the same official language are shown together.
SELECT Name AS country, countrylanguage.Language, countrylanguage.IsOfficial From country
RIGHT JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
WHERE countrylanguage.IsOfficial = 'T'
ORDER BY countrylanguage.Language;

#10. Get the top 100 cities with the most population.  Display the city's full country name also as well as their official language.
SELECT country.Name AS country, city.Name as city, countrylanguage.Language, countrylanguage.IsOfficial From country
INNER JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
INNER JOIN city ON country.Code = city.CountryCode
WHERE countrylanguage.IsOfficial = 'T'
ORDER BY city.Population DESC
LIMIT 100;

#11. Get the top 100 cities with the most population where the life_expectancy for the country is less than 40.
SELECT country.Name AS country, country.LifeExpectancy, city.Name as city, city.Population From city
LEFT JOIN country ON city.CountryCode = country.Code
WHERE country.LifeExpectancy < 40
ORDER BY city.Population DESC
LIMIT 100;

#12. Get the top 100 countries who speak English and where life expectancy is highest.  Show the country with the highest life expectancy first.
SELECT country.Name AS country, city.Name as city, country.LifeExpectancy From country
LEFT JOIN city ON country.Code = city.CountryCode
LEFT JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
WHERE countrylanguage.Language = 'English'
ORDER BY country.LifeExpectancy DESC
LIMIT 100;