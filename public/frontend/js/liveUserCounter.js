(function($){

    $(document).ready(function(){
        /**
         * live user registration data
         */
        allUsers();
        function allUsers(){
            $.ajax({
                url: '/users/allUsers',
                method: 'POST',
                success: function(data){
                    $('#live-register').text(data);
                }
            });
        }
        setInterval(allUsers, 7000);
    });

})(jQuery)
