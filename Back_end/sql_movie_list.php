<?php
$sql = "SELECT 
  mm_movies.movie_id,
  mm_movies.movie_title,
  mm_movies.movie_plot,
  mm_movies.movie_runtime,
  mm_movies.movie_release_date,
  mm_movies.movie_income,
  mm_rating.rate_name,
  GROUP_CONCAT(mm_genres.genres_title ORDER BY mm_genres.genres_title ASC SEPARATOR ', ') as group_genres_title


FROM mm_movies 
INNER JOIN 
mm_rating 

ON 
mm_movies.rate_id = mm_rating.rate_id
INNER JOIN 
mm_movies_genres
ON 
mm_movies.movie_id = mm_movies_genres.movie_id
  
INNER JOIN 
mm_genres

ON 
mm_movies_genres.genres_id = mm_genres.genres_id
  
GROUP BY
mm_movies.movie_id
"

?>