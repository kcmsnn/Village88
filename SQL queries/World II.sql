#1. How many countries in each continent have life expectancy greater than 70?
SELECT Continent, COUNT(Name) AS total_countries, LifeExpectancy FROM country
WHERE LifeExpectancy > 70
GROUP BY Continent;

#2. How many countries in each continent have life expectancy between 60 and 70?
SELECT Continent, COUNT(Name) AS total_countries, LifeExpectancy FROM country
WHERE LifeExpectancy > 60 AND LifeExpectancy < 70
GROUP BY Continent;

#3. How many countries have life expectancy greater than 75?
SELECT Name AS country, LifeExpectancy FROM country
WHERE LifeExpectancy > 75;

#4. How many countries have life expectancy less than 40?
SELECT Name AS country, LifeExpectancy FROM country
WHERE LifeExpectancy < 40;

#5. How many people live in the top 10 countries with the most population?
SELECT Name as country, Population FROM country
ORDER BY Population DESC
LIMIT 10;


#6. According to the world database, how many people are there in the world?
SELECT SUM(Population) AS total_population FROM country;

#7. Show results for continents where it shows the continent name and the total population. Only show results 
#where the total_population for the continent is more than 500,00,000. If. the continent doesn't have 
#500,000,000 people, do NOT show the result.
SELECT Continent, SUM(Population) AS total_population  FROM country
GROUP BY Continent
HAVING SUM(Population) > 500000000;

#8. Show results of all continents that has average life expectancy for the continent to be 
#less than 71. Show each of these continent name, how many countries there are in each of the continent, total 
#population for the continent, as well as the life expectancy of this continent. For example, as Europe and North 
#America both have continent life expectancy greater than 71, these continents shouldn't show up in your sql 
#results.
SELECT Continent, Name AS country, Population AS total_population, avg(LifeExpectancy) AS life_expectancy FROM country
GROUP BY Continent
HAVING avg(LifeExpectancy) < 71;

#Now that you've used the group by a bit, let's now have you use this together with other records that were joined from 
#multiple tables.

#Now, write a SQL query to obtain answers to the following questions:

#1. How many cities are there for each of the country? Show the total city count for each country where you 
#display the full country name.
SELECT country.Name AS country, COUNT(city.Name) AS numbers_of_cities FROM country
LEFT JOIN city ON country.Code = city.CountryCode
GROUP BY country;

#2. For each language, find out how many countries speak each language.
SELECT country.Name AS country, countrylanguage.Language, COUNT(country.Name) AS numbers_of_countries FROM country
LEFT JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
GROUP BY countrylanguage.Language;

#3. For each language, find out how many countries use that language as the official language.
SELECT countrylanguage.Language, COUNT(country.Name) AS numbers_of_countries, countrylanguage.IsOfficial FROM country
LEFT JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
WHERE countrylanguage.IsOfficial ='T'
GROUP BY countrylanguage.Language;

#4. For each continent, find out how many cities there are (according to this database) and the average population 
#of the cities for each continent. For example, for continent A, have it state the number of cities for that
#continent, and the average city population for that continent.
SELECT Continent, COUNT(city.CountryCode) AS number_of_countries, AVG(city.Population) AS average_cities_population FROM country
LEFT JOIN city ON country.Code = city.CountryCode
GROUP BY Continent;

#5. (Advanced) Find out how many people in the world speak each language. Make sure the total sum of. this 
#number is comparable to the total population in the world
SELECT Language, SUM((Population * Percentage)/100)  AS total_population FROM country
INNER JOIN countrylanguage ON country.Code = countrylanguage.CountryCode
GROUP BY Language
ORDER BY total_population DESC;