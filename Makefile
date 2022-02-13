build:
	docker build -t lej-com-de-bike-build:latest .

run-resolution-rival: build
	docker run lej-com-de-bike-build:latest run resolution-rival.txt
