<script>
    var chosenColor = document.getElementById("favColor");
    chosenColor.addEventListener("input", function() {
        document.getElementById("hex").value =  chosenColor.value;
    }, false);
</script>