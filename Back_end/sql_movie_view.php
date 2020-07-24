<?php
$sql = "SELECT 
  mm_movies.movie_title,
  mm_movies.movie_plot,
  mm_movies.movie_runtime,
  mm_movies.movie_release_date,
  mm_movies.movie_income,
  mm_rating.rate_name,
  mm_director.director_birthplace,
  mm_director.director_birthdate,
  mm_writer.writer_aka,
  image.image,
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

INNER JOIN 
	mm_movies_director
ON 
	mm_movies.movie_id = mm_movies_director.movie_id
    
INNER JOIN 
	mm_director

ON 
	mm_movies_director.director_id = mm_director.director_id
    
INNER JOIN 
	mm_movies_writer 

ON 
	mm_movies.movie_id = mm_movies_writer.movie_id
    
INNER JOIN 
	mm_writer

ON 
	mm_movies_writer.writer_id = mm_writer.writer_id 

  INNER JOIN 
	mm_image_upload_list 
ON 
	mm_movies.movie_id = mm_image_upload_list.movie_id
INNER JOIN 
  image
ON 
  mm_image_upload_list.image_id = image.id 
WHERE 
mm_movies.movie_id = " . $get_id;
?>