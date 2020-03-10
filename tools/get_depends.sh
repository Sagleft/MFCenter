echo "remove old files.."
rm -rf ../controller/public_html/css/external
rm -rf ../controller/public_html/js/external
mkdir ../controller/public_html/css/external
mkdir ../controller/public_html/js/external

echo "Downloading Bootstrap 4.3.1.."
python3 dfile.py https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css ../controller/public_html/css/external/bootstrap.min.css

# echo "Downloading ionicons 3.0.0.."
# curl 'https://cdnjs.cloudflare.com/ajax/libs/ionicons/3.0.0/css/ionicons.css' > ../controller/public_html/css/external/ionicons.css

echo "Downloading OwlCarousel 2.3.4.."
python3 dfile.py https://github.com/OwlCarousel2/OwlCarousel2/archive/2.3.4.tar.gz owl.tar.gz
tar -xzf owl.tar.gz OwlCarousel2-2.3.4/dist/owl.carousel.min.js --strip=2
mv owl.carousel.min.js ../controller/public_html/js/external
rm -f owl.tar.gz

echo "Done"
