@extends('main.admin')
@section('content')


<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">book Lists</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="admin-add-book.html" class="btn btn-primary">Add New book</a>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="table-responsive">
                      <table class="data-tables table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 3%;">No</th>
                                <th style="width: 12%;">Book Image</th>
                                <th style="width: 15%;">Book Name</th>
                                <th style="width: 15%;">Book Catrgory</th>
                                <th style="width: 15%;">Book Author</th>
                                <th style="width: 18%;">Book Description</th>
                                <th style="width: 7%;">Book Price</th>
                                <th style="width: 7%;">Book pdf</th>
                                <th style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><img class="img-fluid rounded" src="images/browse-books/01.jpg" alt=""></td>
                                <td>Reading on the Worlds</td>
                                <td>General Books</td>
                                <td>Jhone Steben</td>
                                <td>
                                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet</p>
                                </td>
                                <td>$89</td>
                                <td><a href="book-pdf.html"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>                                        
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-book.html"><i class="ri-pencil-line"></i></a>
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.html#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><img class="img-fluid rounded" src="images/browse-books/02.jpg" alt=""></td>
                                <td>The Catcher in the Rye</td>
                                <td>History Books</td>
                                <td>Fritz Wold</td>
                                <td>
                                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet</p>
                                </td>
                                <td>$89</td>
                                <td><a href="book-pdf.html"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>                                        
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-book.html"><i class="ri-pencil-line"></i></a>
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.html#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><img class="img-fluid rounded" src="images/browse-books/03.jpg" alt=""></td>
                                <td>Little Black Book</td>
                                <td>Comic Books</td>
                                <td>John Klok</td>
                                <td>
                                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet</p>
                                </td>
                                <td>$129</td>
                                <td><a href="book-pdf.html"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>                                        
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-book.html"><i class="ri-pencil-line"></i></a>
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.html#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><img class="img-fluid rounded" src="images/browse-books/04.jpg" alt=""></td>
                                <td>Take On The Risk</td>
                                <td>General Books</td>
                                <td>George Strong</td>
                                <td>
                                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet</p>
                                </td>
                                <td>$89</td>
                                <td><a href="book-pdf.html"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>                                        
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-book.html"><i class="ri-pencil-line"></i></a>
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.html#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><img class="img-fluid rounded" src="images/browse-books/05.jpg" alt=""></td>
                                <td>Absteact On Background</td>
                                <td>Film & Photography</td>
                                <td>Ichae Semos</td>
                                <td>
                                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet</p>
                                </td>
                                <td>$99</td>
                                <td><a href="book-pdf.html"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>                                        
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-book.html"><i class="ri-pencil-line"></i></a>
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.html#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><img class="img-fluid rounded" src="images/browse-books/06.jpg" alt=""></td>
                                <td>Find The Wave Book</td>
                                <td>General Books</td>
                                <td>Fidel Martin</td>
                                <td>
                                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet</p>
                                </td>
                                <td>$100</td>
                                <td><a href="book-pdf.html"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>                                        
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-book.html"><i class="ri-pencil-line"></i></a>
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.html#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td><img class="img-fluid rounded" src="images/browse-books/07.jpg" alt=""></td>
                                <td>See the More Story</td>
                                <td>Horror Story</td>
                                <td>Jules Boutin</td>
                                <td>
                                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet</p>
                                </td>
                                <td>$79</td>
                                <td><a href="book-pdf.html"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>                                        
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-book.html"><i class="ri-pencil-line"></i></a>
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.html#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td><img class="img-fluid rounded" src="images/browse-books/08.jpg" alt=""></td>
                                <td>The Wikde Book</td>
                                <td> Computers & Internet</td>
                                <td>Kusti Franti</td>
                                <td>
                                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet</p>
                                </td>
                                <td>$89</td>
                                <td><a href="book-pdf.html"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>                                        
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-book.html"><i class="ri-pencil-line"></i></a>
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.html#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td><img class="img-fluid rounded" src="images/browse-books/09.jpg" alt=""></td>
                                <td>Conversion Erik Routley</td>
                                <td>Sports</td>
                                <td>Argele Intili</td>
                                <td>
                                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet</p>
                                </td>
                                <td>$79</td>
                                <td><a href="book-pdf.html"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>                                        
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-book.html"><i class="ri-pencil-line"></i></a>
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.html#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td><img class="img-fluid rounded" src="images/browse-books/10.jpg" alt=""></td>
                                <td>The Leo Dominica</td>
                                <td>General Books</td>
                                <td>Henry Jurk</td>
                                <td>
                                  <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet</p>
                                </td>
                                <td>$99</td>
                                <td><a href="book-pdf.html"><i class="ri-file-fill text-secondary font-size-18"></i></a></td>                                        
                                <td>
                                   <div class="flex align-items-center list-user-action">
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="admin-add-book.html"><i class="ri-pencil-line"></i></a>
                                     <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.html#"><i class="ri-delete-bin-line"></i></a>
                                  </div>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>



@endsection