<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


 $(document).ready(function() {
        $('button[name="follow"]').click(function(e) {
            e.preventDefault();
         
            $.ajax({
                url:routes,
                method: 'post',
                data: {
                    _token: $('input[name="_token"]').val()
                },
                success: function(data) {
                    console.log(data.success);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });

