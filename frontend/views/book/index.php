<?php

$this->title = 'Books';

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Author</th>
      <th scope="col">Title</th>
      <th scope="col">Pages</th>
      <th scope="col">Genre</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($books as $book) : ?>
    <tr>
      <th scope='row'><?= $book['author']['name'] .' '. $book['author']['surname'] ?></th>
      <td><?= $book['book']['title'] ?></td>
      <td><?= $book['book']['pages'] ?></td>
      <td><?= $book['book']['genre']?></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>

