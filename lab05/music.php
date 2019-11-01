<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
			$song_count = 5678;
		?>
		<p>
			I love music.
			I have <?= $song_count ?> total songs,
			which is over <?= (int)($song_count/10) ?> hours of music!
		</p>

		<?php
		  echo $_SERVER['QUERY_STRING'];
		 ?>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>

			<ol>
	      <?php
				  $news_pages = 5;
					$new_pages = $_GET["newspages"];
				  for ($i=0; $i < $news_pages; $i++) {
				?>
	        <li> <a href="https://www.billboard.com/archive/article/2019<?= 11 - $i ?>">2019-<?= 11 - $i ?></a></li>
	      <?php } ?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>

      <?php
			  $favArt = file("favorite.txt");
				for ($i=0; $i < count($favArt); $i++) {
					$temp = $favArt[$i];
					$arr = explode(" ", $temp);
					$arr2 = implode("-", $arr); ?>
					<li> <a href="http://en.wikipedia.org/wiki/<?=$arr2?>"><?=$favArt[$i]?></a></li>
       <?php } ?>

			</ol>
		</div>

		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				  $fileArry = glob("lab5/musicPHP/songs/*.mp3");
          $fileArry2 = scandir("lab5/musicPHP/songs");
					for ($i=0; $i < count($fileArry); $i++) { ?>
            <li class="mp3item"> <a href="<?= $fileArry[$i] ?>">
							 <?= basename($fileArry[$i]).' ('.((int)(filesize($fileArry[$i])/1024)).'KB'.')' ?></a>
					  </li>
				<?php	} ?>

				<?php
				  $m3uArry = glob("lab5/musicPHP/songs/*.m3u");
          rsort($m3uArry);
					for ($i=0; $i < count($m3uArry); $i++) { ?>
            <li class="playlistitem"><?= basename($m3uArry[$i]).":" ?>
							<ul>
								<?php
								  $temp = file("$m3uArry[$i]");
									shuffle($temp);
									$comment = '#';

							  	for ($j=0; $j < count($temp); $j++) {
										$check = strpos($temp[$j], $comment);
										if($check === false)
										{ ?>
							  	    <li><?= $temp[$j] ?></li>
									<?php }
								  } ?>
				      </ul>
						</li>
			  <?php } ?>
		  </ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
