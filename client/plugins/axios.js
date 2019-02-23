import axios from "axios";

const my_app = axios.create({
  baseURL: ""
});

function getAlbum(album_name) {
  return my_app.get(["api", "album", album_name].join("/"));
}

export { getAlbum };
