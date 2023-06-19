async function fetchArticles() {
    try {
      let response = await fetch("https://api.nytimes.com/svc/topstories/v2/world.json?api-key=e7hA4infH5PUgsfP8qH51Mf68TYavGqk");
      let data = await response.json();
      let articles = data.results.slice(0, 14);
      return articles;
    } catch (err) {
      console.error("Error: ", err);
      return [];
    }
  }

  function updateTVScreen(article) {
    document.getElementById("articleTitle").textContent = article.title;
    document.getElementById("articleAbstract").textContent = article.abstract;

    if (article.multimedia && article.multimedia.length > 0) {
      let imageUrl = article.multimedia[0].url;
      document.getElementById("articleImage").src = imageUrl;
    }

    // Check if the article has a URL for the full article
    if (article.url) {
      // Remove any existing "Read More" link
      let existingReadMoreLink = document.querySelector(".read-more-link");
      if (existingReadMoreLink) {
        existingReadMoreLink.parentNode.removeChild(existingReadMoreLink);
      }

      // Create a new "Read More" link
      let readMoreLink = document.createElement("a");
      readMoreLink.textContent = "Read More";
      readMoreLink.href = article.url;
      readMoreLink.target = "_blank";
      readMoreLink.classList.add("read-more-link");

      // Append the new "Read More" link to the TV screen
      let tvScreen = document.getElementById("tvScreen");
      tvScreen.appendChild(readMoreLink);
    }
  }

  // Rotate through the articles at a specified interval
  function rotateArticles(articles) {
    let currentIndex = 0;

    // Function to switch to the next article
    function switchArticle() {
      updateTVScreen(articles[currentIndex]);
      currentIndex = (currentIndex + 1) % articles.length; // Loop back to the first article
    }

    // Initial display of the first article
    switchArticle();

    // Set the interval for switching articles (e.g., every 5 seconds)
    setInterval(switchArticle, 5000);
  }

  // Call the functions to fetch articles and rotate them on the TV screen
  fetchArticles()
    .then((articles) => {
      rotateArticles(articles);
    })
    .catch((err) => {
      console.error("Error: ", err);
    });
