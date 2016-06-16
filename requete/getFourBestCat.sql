SELECT categories.id, categories.title, categories.description, count(movies.id) AS count
FROM categories
INNER JOIN movies ON movies.categories_id = categories.id
GROUP BY categories.id 
ORDER BY count DESC
LIMIT 4
