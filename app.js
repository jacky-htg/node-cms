//express
const express = require('express')
const http = require('http')
const app = express()

// config
const config = require('./config')
app.use(config())

// session
const session = require('express-session')
const FileStore = require('session-file-store')(session)
const flash = require('express-flash')

app.use(session({ secret: 'keyboard cat',
    resave: false,
    saveUninitialized: false,
    store: new FileStore,
    cookie: { maxAge: 3600000,secure: false, httpOnly: true }
  })
)
app.use(flash())

// to get post data on body
const bodyParser      = require('body-parser')
const methodOverride  = require('method-override')
app.use(bodyParser.urlencoded({ extended: true }))
app.use(methodOverride(function (req, res) {
  if (req.body && typeof req.body === 'object' && '_method' in req.body) {
    // look in urlencoded POST bodies and delete it
    var method = req.body._method
    delete req.body._method
    return method
  }
}))

// routing
require('./route/router')(app)

// views and staticpath
const path = require('path')
app.set('views', path.join(__dirname, 'views'))
app.use(express.static(path.join(__dirname, 'public')))

// view engine handlebars
var handlebars  = require('express-handlebars'), hbs
var handlebars_sections = require('express-handlebars-sections')

hbs = handlebars.create({
   defaultLayout: 'Main',
   partialsDir: 'views/partials/',
   helpers: {
        equal: function (v1, v2, options) {
          if(v1 === v2) {
            return options.fn(this);
          }
          return options.inverse(this);
        }
    }
})



handlebars_sections(hbs)

app.engine('handlebars', hbs.engine)
app.set('view engine', 'handlebars')

http.createServer(app).listen(3000, function(){
  console.log('Express server listening on port 3000')
});
