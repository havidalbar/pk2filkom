<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Buat Pos Baru</title>

	<!-- include libraries(jQuery, bootstrap) -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

	<script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/decoupled-document/ckeditor.js"></script>
</head>

<body>
	<script>
		getEditorData = () => {
			let editorContent = $('#editor').html();
			$("input[name=deskripsi]").val(editorContent);
			$('#submitter').trigger('click');
		}
	</script>
	<h1><?php echo $artikel ? 'Ubah' : 'Buat' ?> Artikel</h1>
	<form action="" method="post" id="formPost" enctype="multipart/form-data">
		{{ csrf_field() }}
		<label>Judul*:<br />
			<input type="text" name="judul" required <?php
				if ($artikel) {
					echo 'value="' . $artikel->judul . '"';
				}
				?> />
		</label><br />
		<label>Kategori*:<br />
			<select name="slug_kategori" required>
				<option value="" disabled <?php
				if(empty($artikel)) {
					echo 'selected';
				}
				?>>Pilih kategori</option>
				<?php
				foreach ($kategori as $k) {
					echo '<option value ="'.$k->slug.'"';
					if($artikel && $artikel->slug_kategori == $k->slug) {
						echo 'selected';
					}
					echo'>'.$k->jenis.'</option>';
				}
				?>
			</select>
		</label><br />
		<label>Gambar thumbnail:<br />
			<input type="file" name="thumbnail" accept="image/*" />
		</label><br />
		<input type="hidden" name="deskripsi" id="deskripsi">
		<!-- The toolbar will be rendered in this container. -->
		<div id="toolbar-container"></div>

		<!-- This container will become the editable. -->
		<div id="editor"><?php
			if ($artikel) {
				echo $artikel->deskripsi;
			}
		?></div>
		<button type="submit" id="submitter" style="display: none"></button>
		<button onclick="getEditorData()" type="button">Pos Artikel</button>
	</form>
	<script src="{{asset('js/CKEditorBarBar.js')}}"></script>
</body>

</html>