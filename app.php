<h1>Get All</h1>
<form action="http://localhost/laravel5/public/Product" method="GET">
	<input type="submit" name="show all">
</form>

<h1>Create new</h1>
	<form action="http://localhost/laravel5/public/Product" method="POST">
		<label>Name</label><input type="text" name="name"> <br>
		<label>Image</label><input type="text" name="image"><br>
		<label>Price</label><input type="text" name="price"><br>
		<input type="submit" name="Add new">
</form>

<h1>edit product</h1>
	<form action="http://localhost/laravel5/public/Product/3" method="POST">
		<input type="hidden" name="_method" value="PUT">
		<label>Name</label><input type="text" name="name"> <br>
		<label>Image</label><input type="text" name="image"><br>
		<label>Price</label><input type="text" name="price"><br>
		<input type="submit" name="Update id =3">
</form>

<h1>edit product</h1>
	<form action="http://localhost/laravel5/public/Product/5" method="POST">
		<input type="hidden" name="_method" value="DELETE">
		<input type="submit" name="Update id =5">
</form>