// Set product name capitalize
$('.text-name').on('change keydown paste', function(e) {
    if (this.value.length = 1) {}
    var $this_val = $(this).val();
    $this_val = $this_val.toLowerCase().replace(/\b[a-z]/g, function(char) {
        return char.toUpperCase();
    });
    $(this).val($this_val);
});