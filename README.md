# SymVue

A media Web Project built upon Symfony & vue.js for your next website or application. The Symfony Framework is minimally tuned, routing includes a REST interface for accessing your AWS S3 Bucket, a Glide Cloud Image Server, and a modern vue.js boilerplate for the frontend client.  Get your next project up and running with SymVue, a minimal base to start developing with vue.js.  

### Why?

The beauty of Symfony and vue.js together is a clear abstraction between view and controller.  On a recent photography website we needed to display high-resolution picture albums.  New albums would frequently be added in their original size, however on the website we needed to display resized versions.  

### Solution

Our solution is built on hosting images in an AWS S3 Bucket, and processing the images server-side with PHP. From the Bucket the images are retrieved through a cloud filesystem interface, processed with the defined size formats, then stored locally on the server.

The frontend client lets the Symfony controller handle loading the image. No need to require these assets with webpack! Simply do a get request to the albums endpoint, and the resulting JSON includes the image paths. 

# Features
* [Symfony](https://github.com/symfony/symfony)
* [Flysystem](https://github.com/thephpleague/flysystem)
* [Glide](https://github.com/thephpleague/glide)
* [Webpack-Encore](https://github.com/symfony/webpack-encore)
* [vue.js](https://github.com/vuejs)
* [vue-router](https://github.com/vuejs/vue-router)
* [axios](https://github.com/axios/axios) 

Also includes a [vue-bootstrap](https://bootstrap-vue.js.org/) demo website with vue-fontawesome to demonstrate the routes, data getters and to help get the project started. 

# Demo

[http://symvue.jameshcooper.com](http://symvue.jameshcooper.com) - IMDB Movie App


# Installation & Development

1. `cd /var/www`
2. `git clone . `
3. once cloned, the project is ready for edits and to fetch our dependencies
4. rename `.env.example` to `.env.local`
5. edit `.env` and `.env.local`  give your app a name and generate an image signing key 
6. `composer install --no-dev` fetches the php packages
7. `yarn` fetches the js modules
8. `yarn dev` starts the client with 'hot reloading'

Please visit http://symvue.jameshcooper.com/ for your new project.

## Project root example

My website is http://symvue.jameshcooper.com/ 

The web server root on the filesystem is `/var/www/public/`

The SymVue project root needs to reside out of the web server root e.g. `/var/www`

http://symvue.jameshcooper.com/ serves `/var/www/public/index.php`

For more information see [Symfony - Configuring a Web Server](https://symfony.com/doc/current/setup/web_server_configuration.html)

## Image Storage

1) On AWS S3, create a private S3 bucket

2) Next create an AWS IAM user with access to the bucket

3) Edit `.env.local` with your AWS credentials -
```
AWS_BUCKET=mybucket
AWS_REGION=eu-west-2
AWS_KEY=mykey
AWS_SECRET=mysecret
```
4) In the bucket create a directory per album, and upload images into each directory.  

### Routes

There are three controllers which serve the routes. 

1) VueController: Renders the Frontend Client with its own [page router](vue-router).
```
[GET] / 
[GET] /all-routes-load-our-client
```
2) APIController - Queries a directory in the S3 Bucket
```
[GET] /api/album/directory_name
```
3) ImageController - Serves the image  
```
[GET] /img/directory_name/image.jpgp=small&s=3bab352a1e50f1861c78b63e9ddbe7ba
```

Image parameters -

```
p: Preset
s: Signature
```

#### Image Presets

Included are presets for a few different sized images.  Resizing is based on the images width and the canvas proportions are kept intact. Please edit `src/Server/ImageServer.php` to extend the presets.

Presets are incredibly powerful and can flip, crop, watermark and add effects to the images. Please see the [Glide API](http://glide.thephpleague.com/1.0/api/quick-reference/) for more information.

#### Example album request
```
[GET] http://symvue.jameshcooper.com/api/album/tt1109624/all
```
#### Response
```200```

##### HEADERS
```Content-Type: application/json```

##### BODY
```
[
  {
    "name": "my-original-image.jpg",
    "path": {
      "small": "/img/myalbum/my-original-image.jpg?p=small&s=4c7c6505319f045c4ee6965a391e59ed",
      "medium": "/img/myalbum/my-original-image.jpg?p=medium&s=f277f843ca5ee128ef3ce2eecba4a185",
      "large": "/img/myalbum/my-original-image.jpg?p=large&s=3bab352a1e50f1861c78b63e9ddbe7ba"
    }
  },
  {
    "name": "next-image.jpg",
    "path": {
      "small": "/img/myalbum/next-image.jpg?p=small&s=50a4d12d7460563234155d23a3e875c6",
      "medium": "/img/myalbum/next-image.jpg?p=medium&s=fe5e5ed8dd000580dda03984ab81623d",
      "large": "/img/myalbum/next-image.jpg?p=large&s=8dcc79f8da01c185b21e874f944d08b0"
    }
  },
]
```
## Frontend Client

Please create your application in `'client/'`

### Load an image album
Please see `'client/router/pages/MyApp_Album.vue'`

### Create a page
Please add to `'client/router/pages/'`

### <a name="vue-router">Define routes</a>
Please edit `'client/router/index.js'`

### REST Interface with Axios
Edit `client/plugins/axios.js`

The `my_app` instance is for accessing our SymVue REST. Additional endpoints can be added here.

If you need to connect to a different API, please create a new instance of Axios and update the baseURL -

```
const imdb_api = axios.create({
  baseURL: "http://omdbapi.com/"
});
```

### Hot reloading

`yarn dev` starts the client with 'hot reloading'

While developing if you make a change in a .vue file, there's no need to refresh the page. 

Coupled with Chrome's Vue.js devtools extension, projects are a lot of fun to develop! 

## Production

If you develop in a local environment, SymVue is easy to deploy to a production server. 

1. `yarn prod` to compile assets on local
2. commit into git and pull on production
3. create a seperate .env.local on production, ensure `APP_ENV=prod`
4. `composer install --no-dev --optimize-autoloader` on production

### Extending (optional)  
Once Symfony is installed on production, SymVue can be extended in order for frontend client updates to be pushed as a separate process. 

* Add `public/build` to the `.gitignore` 
* Edit `webpack.config.js` to include a CDN public path

### Launching with Bitbucket or AWS Codedeploy

If you use Bitbucket or AWS Codedeploy, please see `appspec.yml` to launch in 1-Click to an AWS EC2 instance. Please see the `'config/scripts'` directory for a few example Docker scripts.

# Requirements

### Web Server
* HTTP server including nginx, apache or caddy
* PHP7 with GD or ImageMagick 
* Composer
* npm or yarn

### Image Hosting
* AWS S3, or S3 compatible