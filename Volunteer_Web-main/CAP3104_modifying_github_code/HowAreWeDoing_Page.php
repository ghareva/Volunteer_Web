<?php
    include_once 'header.php';
?>

<style>
    .stars {
        display: flex;
        justify-content: center;
        margin: 1rem 0;
    }

    .star {
        font-size: 2rem;
        color: gray;
        cursor: pointer;
        transition: color 0.2s;
    }

    .star.hovered,
    .star.selected {
        color: gold;
    }

    textarea {
        width: 100%;
        height: 100px;
        margin-top: 1rem;
        padding: 0.5rem;
        border-radius: 6px;
        border: 1px solid #ccc;
        resize: vertical;
    }

    button {
        margin-top: 1.5rem;
        padding: 0.5rem 1.5rem;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }
</style>

<div class="survey-container">
    <h2>How Are We Doing?</h2>
    <p>What do you think of our website?</p>
    
    <div class="stars" id="starRating">
        <span class="star" data-value="1">&#9733;</span>
        <span class="star" data-value="2">&#9733;</span>
        <span class="star" data-value="3">&#9733;</span>
        <span class="star" data-value="4">&#9733;</span>
        <span class="star" data-value="5">&#9733;</span>
    </div>

    <form method="POST" action="">
        <input type="hidden" name="rating" id="ratingInput" value="0">
        <textarea name="feedback" placeholder="Optional feedback..."></textarea>
        <br>
        <button type="submit">Submit</button>
    </form>
</div>

<script>
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('ratingInput');
    let selectedRating = 0;

    stars.forEach((star, index) => {
        star.addEventListener('mouseenter', () => {
            stars.forEach((s, i) => s.classList.toggle('hovered', i <= index));
        });

        star.addEventListener('mouseleave', () => {
            stars.forEach((s, i) => s.classList.toggle('hovered', i < selectedRating));
        });

        star.addEventListener('click', () => {
            selectedRating = index + 1;
            ratingInput.value = selectedRating;
            stars.forEach((s, i) => s.classList.toggle('selected', i < selectedRating));
        });
    });
</script>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $rating = $_POST['rating'] ?? '0';
        $feedback = $_POST['feedback'] ?? '';

        // For now just echo it back (you can later insert into DB)
        echo "<div style='text-align:center; margin-top:2rem;'>
                <strong>Thanks for your feedback!</strong><br>
                <p>Rating: $rating star(s)</p>
                <p>Feedback: " . htmlspecialchars($feedback) . "</p>
              </div>";
    }

    include_once 'footer.php';
?>
