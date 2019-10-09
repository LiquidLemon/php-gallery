# php-gallery

This is a project I made for my web development class in 2017. 

Most of the *odd* choices made here are due to specific class requirements. These include:
- PHP as the main language.
- Hand-rolled framework.
- MongoDB as the database engine.
- An unholy mess of TypeScript, jQuery, AngularJS and React.

This project is based on the boilerplate I keep in [another repository](https://github.com/LiquidLemon/php-mvc).

## Interesting parts

The only interesting parts of this project are inside the homebrew framework:
- [Single entrypoint](/web/app.php) with a [router inspired by Rails and Laravel](Router.php).
- Easy to use [flash](/Flash.php) interface inspired by Rails.
- A very basic [ORM](/models) inspired by Rails' Active Record.
- Well separated (both from the controllers and the horrible templates), easily defined [view layer](/views).

## Trivia

This is the second rendition of this project.
I accidentally deleted it in its entirety (along with the repository) half a day before the due date and rewrote it almost from scratch 7 hours.
Remember to push your repositories often kids.

The second version is better.

## License

You are free to use this code however you want, although I don't recommend doing so for anything else than education.

See [UNLICENSE](./UNLICENSE) for licensing details.
