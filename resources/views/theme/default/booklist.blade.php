@extends('theme.default.layout')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{__("Book List")}}</h2>
                    <ul>
                        <li><a href="https://ndcm.edu.bd/">{{__("Home")}}</a></li>
                        <li>{{__("Book List")}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->



    <!-- single page start -->
    <section class="single_page">
        <div class="container">

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" placeholder="{{__("Search Book by name, author, code")}}"
                            title="Type in a name">
                    </div>
                </div>
            </div>
            <hr>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>{{("SL")}}</th>
                        <th>{{__("Book Name")}}</th>
                        <th style="width: 100px;">{{__("Book Code")}}</th>
                        <th>{{__("Writer")}}</th>
                    </tr>
                </thead>
                <tbody id="table-body">

                </tbody>
            </table>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            var searchTerm = '';
            loadTable(searchTerm);

            function loadTable(searchTerm) {

                $.ajax({
                    url: "{{ route('searchBook') }}",
                    method: "GET",
                    data: {
                        search: searchTerm
                    }, // Send the search term to the server
                    dataType: "json",
                    success: function(data) {
                        console.log('data', data)


                        // Populate the table with data
                        $("table").find("tr:gt(0)").remove();

                        // Populate the table with data
                        $.each(data.books, function(key, book) {
                            $("table").append("<tr>" +
                                "<td>" + (key + 1) + "</td>" +
                                "<td>" + book.name + "</td>" +
                                "<td>" + book.code + "</td>" +
                                "<td>" + book.author + "</td>" +
                                "</tr>");
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
            $("#search").on("keyup", function() {
                searchTerm = $(this).val();
                loadTable(searchTerm);

            });

        });
    </script>
@endsection
