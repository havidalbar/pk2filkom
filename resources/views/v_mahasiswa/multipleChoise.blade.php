@extends ('layouts.template')
@section('title', 'Berita | FILKOM UB')

@section('content')
<!-- Navbar atas -->
@include('layouts.header')
<!-- endNavbar atas -->

<div class="jumbotron jumbotron-fluid pk2-dtBerita p-0 mb-4" style="background-size: auto">    
  <!-- Title -->
  <div class="title">
    <div class="container">
        <div class="row">
            <div class="titlePk2Maba m-auto multipleChoise">
                <h1 class="titleSection">post test</h1>
            </div>
        </div>
        <ul>
          <li>announcement</li>
          <li>jawablah dengan benar</li>
          <li>Libero voluptatum saepe culpa architecto!</li>
        </ul>
    </div>
  </div>
  <!-- EndTitle -->
</div>
<div class="container-fluid">
  <div class="container">
    <form action="" method="POST">
        <div class="question">
            <p><strong>1 . </strong>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut suscipit facere ex incidunt labore eius.</p>
            <label>
                <input type="radio" name="1" value="a"> Lorem ipsum dolor sit amet.</label>
            <label>
                <input type="radio" name="1" value="b"> Lorem ipsum dolor sit amet.</label>
            <label>
                <input type="radio" name="1" value="c"> Lorem ipsum dolor sit amet.</label>
            <label>
                <input type="radio" name="1" value="d"> Lorem ipsum dolor sit amet.</label>
        </div>
        <div class="question">
            <p><strong>2 . </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, labore. Temporibus veritatis commodi aperiam eaque.</p>
            <label>
                <input type="radio" name="2" value="a"> Lorem ipsum dolor sit amet.</label>
            <label>
                <input type="radio" name="2" value="b"> Lorem ipsum dolor sit amet.</label>
            <label>
                <input type="radio" name="2" value="c"> Lorem ipsum dolor sit amet.</label>
            <label>
                <input type="radio" name="2" value="d"> Lorem ipsum dolor sit amet.</label>
        </div>
        <button type="submit" class="kirimJwb align-self-center"><span>Kirim Jawaban</span></button>
    </form>
  </div>
</div>
  
<!-- Footer -->
@include('layouts.footer')
<!-- Footer -->
@endsection