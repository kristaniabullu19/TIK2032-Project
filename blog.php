<?php
include 'koneksi.php';

$query = "SELECT * FROM blog ORDER BY post_date DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link ke file CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- ======= NAVBAR DAN HEADER (copy dari index.html) ======= -->
  <header class="header">
    <div class="container">
      <h1 class="logo">Portofolio</h1>
      <nav class="nav">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="blog.php" class="active">Blog</a></li>
          <!-- tambahkan link lain jika ada -->
        </ul>
      </nav>
    </div>
  </header>

  <!-- ======= BAGIAN BLOG ======= -->
  <main>
    <section class="blog-posts">
      <div class="container">
        <h2 class="h2 article-title">Blog</h2>

        <ul class="blog-posts-list">
          <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <li class="blog-post-item">
              <a href="#">

                <figure class="blog-banner-box">
                  <img src="assets/images/<?php echo urlencode($row['image']); ?>"
                       alt="<?php echo htmlspecialchars($row['alt_text']); ?>" loading="lazy">
                </figure>

                <div class="blog-content">
                  <div class="blog-meta">
                    <p class="blog-category"><?php echo htmlspecialchars($row['category']); ?></p>
                    <span class="dot"></span>
                    <time datetime="<?php echo $row['post_date']; ?>">
                      <?php echo htmlspecialchars($row['data_range']); ?>
                    </time>
                  </div>

                  <h3 class="h3 blog-item-title"><?php echo htmlspecialchars($row['title']); ?></h3>

                  <p class="blog-text">
                    <?php echo htmlspecialchars(substr($row['content'], 0, 200)) . '...'; ?>
                  </p>
                </div>

              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </section>
  </main>

  <!-- ======= FOOTER (jika ada) ======= -->
  <footer class="footer">
    <div class="container">
      <p>&copy; <?php echo date("Y"); ?> Nia Cantik Blog. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
