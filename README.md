# CodeWithKyrian Blog

<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

## About

CodeWithKyrian is a personal blog where I share insights, tutorials, and experiences in software development. The blog serves as a platform for learning and exploring various technologies, programming languages, and development practices.

## Built With

This project is built using the following technologies:

- **Laravel**: A PHP framework for building web applications with expressive syntax.
- **Livewire**: A full-stack framework for Laravel that makes building dynamic interfaces simple.
- **Tailwind CSS**: A utility-first CSS framework for creating custom designs.
- **Docker**: For containerization and easy deployment.
- **Traefik**: A modern reverse proxy and load balancer for microservices.
- **MySQL**: For database management.
- **Spin**: A command line tool that simplifies Docker management.

## Features

- Responsive design for optimal viewing on various devices.
- Dynamic content management using Laravel and Livewire.
- Easy deployment with Docker and Docker Swarm.
- Comprehensive documentation and tutorials.

## Deployment

The application is deployed using Docker Swarm. The deployment process is automated through GitHub Actions, which builds and deploys the application to a production server.

### Spin Installation

To simplify Docker management, you need to have Spin installed. You can install Spin by running:

```bash
bash -c "$(curl -fsSL https://raw.githubusercontent.com/serversideup/spin/main/tools/install.sh)"
```

### GitHub Actions Workflow

The deployment is managed by a GitHub Actions workflow defined in `.github/workflows/deploy.yml`. This workflow triggers on pushes to the `main` branch and uses SSH to deploy the application to the server.

### Docker Compose

The application uses Docker Compose for local development and production deployment. The configuration files are located in the root directory:

- `docker-compose.prod.yml`: Configuration for production deployment.
- `docker-compose.dev.yml`: Configuration for local development.

## Running the Project

To run the project using Spin, use the following command:

```bash
spin up -d
```

To take the project down, run:

```bash
spin down
```


For more information on using Spin, refer to the [Spin Documentation](https://serversideup.net/open-source/spin).

## Setup

To set up the project locally, follow these steps:

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/CodeWithKyrian/codewithkyrian-blog
   cd codewithkyrian-blog
   ```

2. **Install Dependencies**:
   Make sure you have [Composer](https://getcomposer.org/) and [Node.js](https://nodejs.org/) installed. Then run:
   ```bash
   composer install
   npm install
   ```

3. **Run the Application**:
   You can run the application locally using:
   ```bash
   spin up -d
   ```

## Contributing

Contributions are welcome! If you would like to contribute to the project, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/YourFeature`).
3. Make your changes and commit them (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Open a pull request.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact

For any inquiries or feedback, feel free to reach out to me at [kyrianobikwelu@gmail.com](mailto:kyrianobikwelu@gmail.com).

---

Thank you for visiting my blog! I hope you find the content helpful and inspiring.

