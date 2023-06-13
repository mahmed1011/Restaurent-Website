<!-- Bootstrp -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script>
<!-- jQuery -->
<script src="{{ asset('') }}assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="{{ asset('') }}assets/js/popper.js"></script>
<script src="{{ asset('') }}assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="{{ asset('') }}assets/js/owl-carousel.js"></script>
<script src="{{ asset('') }}assets/js/accordions.js"></script>
<script src="{{ asset('') }}assets/js/datepicker.js"></script>
<script src="{{ asset('') }}assets/js/scrollreveal.min.js"></script>
<script src="{{ asset('') }}assets/js/waypoints.min.js"></script>
<script src="{{ asset('') }}assets/js/jquery.counterup.min.js"></script>
<script src="{{ asset('') }}assets/js/imgfix.min.js"></script>
<script src="{{ asset('') }}assets/js/slick.js"></script>
<script src="{{ asset('') }}assets/js/lightbox.js"></script>
<script src="{{ asset('') }}assets/js/isotope.js"></script>
<script src="{{ asset('') }}assets/fonts/js/fontawesome.js"></script>
<script src="{{ asset('') }}assets/fonts/js/fontawesome.min.js"></script>
<!-- Global Init -->
<script src="{{ asset('') }}assets/js/custom.js"></script>
<script>
    $(function() {
        var selectedClass = "";
        $("p").click(function() {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut();
            setTimeout(function() {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        var silder = $(".owl-carousel");
        silder.owlCarousel({
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: false,
            items: 1,
            stagePadding: 20,
            center: true,
            nav: false,
            margin: 50,
            dots: true,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                480: {
                    items: 2
                },
                575: {
                    items: 2
                },
                768: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    });
</script>
<script type="text/javascript">
    function showit() {
        alert("Are you sure you want to delete it?");

    }
</script>
{{-- <input type="submit" value="Click Me" onClick="showit()"> --}}
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {

        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/

        var $form = $(".require-validation");

        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });

            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }

        });

        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];

                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
</script>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
<script>
    /*!
     * TableSelection library v0.9.1 (https://github.com/WouterWidgets/table-selection)
     * Copyright (c) 2018 Wouter Smit
     * Licensed under MIT (https://github.com/WouterWidgets/table-selection/blob/master/LICENSE)
     */

    class TableSelection {

        constructor(selector = '.table-selection', selectedClass = 'selected') {
            this.selector = selector;
            this.selectedClass = selectedClass;

            this.selection = null;
            this.nativeSelection = null;

            this.setEventHandlers();
        }

        static initialize(selector = '.table-selection', selectedClass = 'selected') {
            new TableSelection(selector, selectedClass);
        }

        setEventHandlers() {
            document.addEventListener('selectionchange', this.selectionChangeHandler.bind(this));
            document.addEventListener('copy', this.copyHandler.bind(this));
        }

        selectionChangeHandler() {
            this.deselect();
            this.nativeSelection = window.getSelection ? getSelection() : null;

            if (!this.nativeSelection) {
                return;
            }

            this.getSelection();
            this.showSelection();
        }

        getSelection() {
            const tds = this.getSelectionTds();

            if (!tds || !tds.start.closest(this.selector)) {
                return;
            }

            const trs = this.getSelectionTrs(tds);

            this.selection = {
                tds: tds,
                trs: trs,
            };

            this.selection.cells = this.getCellsInSelectionRange(this.selection);

            return this.selection;
        }

        getCellsInSelectionRange(selection) {

            const tbody = selection.trs.start.parentElement;
            const hasThead = tbody.previousElementSibling && tbody.previousElementSibling.matches('thead');

            const trStartIndex = selection.trs.start.rowIndex - (hasThead ? 1 : 0);
            const trEndIndex = selection.trs.end.rowIndex - (hasThead ? 1 : 0);

            const tdStartIndex = selection.tds.start.cellIndex;
            const tdEndIndex = selection.tds.end.cellIndex;

            const trs = Array
                .from(tbody.rows)
                .slice(trStartIndex, trEndIndex + 1);

            let cells = [];
            trs.forEach(tr => {
                const tds = Array
                    .from(tr.cells)
                    .slice(tdStartIndex, tdEndIndex + 1);

                cells = cells.concat(tds);
            });

            return cells;
        }

        getSelectionTds() {
            let start = this.nativeSelection.anchorNode;
            let end = this.nativeSelection.focusNode;

            if (!start || !end) {
                return;
            }

            if (start.nodeType !== 1) {
                start = start.parentElement;
            }

            if (end.nodeType !== 1) {
                end = end.parentElement;
            }

            start = start.closest('td');
            end = end.closest('td');

            if (!start || !end) {
                return;
            }

            if (start.cellIndex > end.cellIndex) {
                [end, start] = [start, end];
            }

            return {
                start,
                end
            }
        }

        getSelectionTrs(tds) {
            if (!tds.start || !tds.end) {
                return;
            }

            let start = tds.start.closest('tr');
            let end = tds.end.closest('tr');

            if (start.rowIndex > end.rowIndex) {
                [end, start] = [start, end];
            }

            return {
                start,
                end
            }
        }

        showSelection() {
            this.selection && this.selection.cells.forEach(cell => {
                cell.classList.add(this.selectedClass);
            });
        }

        hideSelection() {
            this.selection && this.selection.cells.forEach(cell => {
                cell.classList.remove(this.selectedClass);
            });
        }

        deselect() {
            if (!this.selection) {
                return;
            }

            this.hideSelection();
            this.selection = null;
            this.nativeSelection = null;
        }

        getSelectionText() {
            let rowData = {},
                data = [];

            this.selection.cells.forEach(cell => {
                const rowIndex = cell.parentElement.rowIndex;
                rowData[rowIndex] = rowData[rowIndex] || [];
                rowData[rowIndex].push(cell.innerText);
            });

            for (const i in rowData) {
                if (!rowData.hasOwnProperty(i)) {
                    continue;
                }
                data.push(rowData[i].join("\t"));
            }

            return data.join("\n");
        }

        copyHandler(e) {
            if (!this.selection) {
                return;
            }
            e.clipboardData.setData('text/plain', this.getSelectionText());
            e.preventDefault();
        }

    }

    TableSelection.initialize();
</script>
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
