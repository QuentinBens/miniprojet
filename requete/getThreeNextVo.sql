SELECT 
	movies.id, AS id
    movies.title, 
    movies.synopsis, 
    date_format(movies.date_release, '%d-%m-%Y') AS date_release, 
    movies.budget, 
    movies.duree,
    categories.title AS category
FROM cinemal9.movies
INNER JOIN categories ON movies.categories_id = categories.id
where date_release > now() AND( bo = 'vo' OR bo ='vost')
order by date_release desc
limit 3
