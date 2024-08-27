<div>
    <form action="" id="search-form">
        <input type="text" name="search" placeholder="Enter your name">
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        $('#search-form').on('keyup change', 'input', function() {
            console.log('hello');
        });
    });
</script>