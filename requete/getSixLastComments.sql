SELECT content,note, date_format(created_at, "Publié le %d-%m-%Y à %k:%i") AS created_at
FROM comments
ORDER BY created_at DESC
LIMIT 6