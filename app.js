const express = require('express')
const config = require('./config')
const http = require('http')
const path = require('path')
const bodyParser = require('body-parser')
const app = express()

const session = require('express-session')
const FileStore = require('session-file-store')(session)
const flash = require('express-flash')

app.use(config())

app.use(session({ secret: 'keyboard cat',
    resave: false,
    saveUninitialized: false,
    store: new FileStore,
    cookie: { maxAge: 3600000,secure: false, httpOnly: true }
  })
)

app.use(bodyParser.urlencoded({ extended: true }))
app.use(flash())

require('./route/router')(app)
var handlebars  = require('express-handlebars'), hbs
var handlebars_sections = require('express-handlebars-sections')

app.set('views', path.join(__dirname, 'views'))
hbs = handlebars.create({
   defaultLayout: 'Main'
})

handlebars_sections(hbs)

app.engine('handlebars', hbs.engine)
app.set('view engine', 'handlebars')

app.use(express.static(path.join(__dirname, 'public')))

http.createServer(app).listen(3000, function(){
  console.log('Express server listening on port 3000')
});
