<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin') }}/lib/chart/chart.min.js"></script>
<script src="{{ asset('admin') }}/lib/easing/easing.min.js"></script>
<script src="{{ asset('admin') }}/lib/waypoints/waypoints.min.js"></script>
<script src="{{ asset('admin') }}/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ asset('admin') }}/lib/tempusdominus/js/moment.min.js"></script>
<script src="{{ asset('admin') }}/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="{{ asset('admin') }}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
</script>

<!-- Template Javascript -->
<script src="{{ asset('admin') }}/js/main.js"></script>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin') }}/lib/chart/chart.min.js"></script>
<script src="{{ asset('admin') }}/lib/easing/easing.min.js"></script>
<script src="{{ asset('admin') }}/lib/waypoints/waypoints.min.js"></script>
<script src="{{ asset('admin') }}/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="{{ asset('admin') }}/lib/tempusdominus/js/moment.min.js"></script>
<script src="{{ asset('admin') }}/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="{{ asset('admin') }}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('admin') }}/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript">
    function showit() {
        alert("Are you sure you want to delete it?");

    }
</script>
<script type="text/javascript">
    function editit() {
        alert("Are you sure you want to edit it?");

    }
</script>
<script type="text/javascript">
    function deliverit() {
        alert("Are you sure you want to Order Deliver it?");

    }
</script>
<script src="https://kit.fontawesome.com/a185f0540a.js" crossorigin="anonymous"></script>
{{-- <input type="submit" value="Click Me" onClick="showit()"> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log(urlToRedirect);
        swal({
                title: "Are you sure to cancel this product",
                text: "You will not be able to revert this!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willCancel) => {
                if (willCancel) {



                    window.location.href = urlToRedirect;

                }


            });


    }
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script> --}}
