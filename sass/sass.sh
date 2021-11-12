sass ./main.scss ../style.css

postcss ../style.css --replace --use autoprefixer
