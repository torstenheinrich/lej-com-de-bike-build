build:
	docker build -t lej-com-de-bike-build:latest .

run-resolution-rival: build
	docker run lej-com-de-bike-build:latest run resolution-rival.txt

run-resolution-force: build
	docker run lej-com-de-bike-build:latest run resolution-force.txt

run-resolution-red: build
	docker run lej-com-de-bike-build:latest run resolution-red.txt
