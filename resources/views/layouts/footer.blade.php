<footer class="container-fluid text-center m-0 fixed-bottom">
    <p class="pt-4 pr-1 m-0 pb-0">Made with love<span><i class="fas
        fa-heart px-1"></i></span> by <img src="/images/logo_footer_black.png" class="footer-logo px-2" alt=""> <a
            href="https://www.facebook.com/brainster.co" class="text-success px-2" target="_blank"> -Say Hi!- </a> Terms
    </p>
    <small class="ml-4 py-0 text-uppercase pt-0">Brainster</small>
</footer>

{{-- Scripts --}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

@if ($errors->has('email') || $errors->has('phone') || $errors->has('company') || Session::has('status'))
    <script>
        $(function() {
            $('#exampleModal').modal({
                show: true
            });
        });

    </script>
@endif


</body>

</html>
