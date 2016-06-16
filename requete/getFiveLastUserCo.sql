SELECT id,avatar, username, email, tel, ville, date_format(lastActivity, "%d-%m-%Y à %k:%i") AS lastActivity
FROM user
WHERE lastActivity > date_sub(now(), INTERVAL 1 WEEK)
ORDER BY lastActivity DESC
LIMIT 5