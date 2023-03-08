<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Title</title>
	<link href="style.css" rel="stylesheet">
</head>
<body>
<div id="form">
	<form action="" method="POST">
		<label>
			Имя:
			<input class="form" name="name" placeholder="Введите ваше имя"/></label><br>
		<label>
			email:
			<input class="form" name="email"
			       placeholder="Введите вашу почту"
			       type="email"/>
		</label><br>
		
		<label>
			дата рождения:
			<input class="form" name="birthday"
			       type="date"/>
		</label><br/>
		<label>
			пол:
			<input checked="checked" class="form" name="sex"
			       type="radio"/>
			мужской</label>
		<label>
			<input class="form" name="sex"
			       type="radio"/>
			женский</label><br>
		
		<label>
			количество конечностей:
			<input checked="checked" class="form" name="limbs" type="radio"/>4</label>
		<label>
			<input class="form" name="limbs" type="radio"/>3</label>
		<label>
			<input class="form" name="limbs" type="radio"/>2</label>
		<label>
			<input class="form" name="limbs" type="radio"/>1</label><br/>
		<label>Сверхспособности:<select class="form" multiple name="superpowers[]">
			<option>бессмертие</option>
			<option>прохождение сквозь стены</option>
			<option>левитация</option>
		</select></label>
		<br>
		
		<label>Биография:
			<textarea class="form" name="bio" placeholder="Расскажите о себе"></textarea>
		</label><br>
		
		<label>С контрактом ознакомлен(а)
			<input class="form" name="contract" type="checkbox">
		</label> <br>
		
		<input class="form" name="Отправить" type="submit">
	</form>
</div>
</body>
</html>