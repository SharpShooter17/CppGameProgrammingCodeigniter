<h3>Tetris</h3>
<div class="divider"></div>

<div class="row">
	<div class="col s12 m6 l4">
		<h4>Opis</h4>
		<p class="flow-text">Tetris to gra, która została napisana za pomocą języka C++ oraz przy użyciu bibliotek SFML i TGUI. Gra polega na układaniu spadających klocków w taki sposób, aby nie pozostawiły pustej przestrzeni na dole po ułożeniu. Gdy zapełni się cały wiersz, następuje jego usunięcie. Należy zdobyć jak najwięcej punktów (usunąć jak najwięcej wierszy). Podejmij wyzwanie i znajdź się na samym szczycie poniższego rankingu!.</p>
	</div>
	<div class="col s12 m6 l3">
		<h4>Sterowanie</h4>
		<p class="flow-text">Spacja - zamień klocek<br />
		P - pauza <br />
		Strzałka w górę - obróć klocek<br />
		Strzałka w lewo - w lewo<br />
		Strzałka w prawo - w prawo<br />
		Strzałka w dół - w dół</p>
		<p class="flow-text"><b>Download game:</b> <a href="../../download/Tetris_SFML_TGUI_C++.zip">link</a></p>
	</div>
	<div class="col m12 l5">
		<img alt="TetrisIMG" title="Tetris" class="responsive-img" src="../../images/tetris_screen.png" />
	</div>
</div>
<div class="divider"></div>
<div class="row">
	<div class="col s12">
		<table class="striped">
			<thead>
				<tr>
					<th><span>#</span></th>
					<th><span>Name</span></th>
					<th class="hide-on-med-and-down"><span>Date</span></th>
					<th class="hide-on-small-only"><span>Lines</span></th>
					<th class="hide-on-small-only"><span>Level</span></th>
					<th><span>Time</span></th>
					<th><span>Scores</span></th>
				</tr>
			</thead>
			<tbody>
				<?php $index = 1; ?>
				<?php foreach($query as $item):
				?>
				<tr>
					<td><?php echo $index; $index++;?>
					</td>
					<td><?php echo $item -> name; ?>
					</td>
					<td class="hide-on-med-and-down"><?php echo $item -> date; ?>
					</td>
					<td class="hide-on-small-only"><?php echo $item -> lines; ?>
					</td>
					<td class="hide-on-small-only"><?php echo $item -> level; ?>
					</td>
					<td><?php echo $item -> time; ?>
					</td>
					<td><?php echo $item -> scores; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
