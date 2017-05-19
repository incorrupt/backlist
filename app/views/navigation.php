
 <div class="ui borderless main menu " >
    <div class="ui text container">
      <div href="#" class="header item">
         <i class="book icon"></i>Каталог книг
      </div>
      <a class="<?=($active_nav=='books') ? 'active' : '';?> item" href="/books/all">Книги</a>
      <a class="<?=($active_nav=='authors') ? 'active' : '';?> item" href="/authors/all">Авторы</a>
      <a class="<?=($active_nav=='genres') ? 'active' : '';?> item" href="/genres/all">Категрии</a>

      <div class="right menu">
        <div class="item">
          <form class="ui action left icon input" action="/search" method="post">
            <i class="search icon"></i>
            <input name="search_str" type="text" placeholder="...">
            <button class="ui button blue ">Поиск</button>
          </form>
        </div>
      </div>
    </div>
  </div>