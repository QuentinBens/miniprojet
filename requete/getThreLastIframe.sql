SELECT medias.id, medias.movies_id, medias.video, movies.title
FROM medias
INNER JOIN movies ON medias.movies_id = movies.id
WHERE video IS NOT NULL
AND video REGEXP '<iframe(.+)?>'
