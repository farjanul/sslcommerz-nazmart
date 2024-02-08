# Plugin Development
Here is a Plugin with a Custom payment gateway implemented, you can explore it to understand how it works.

## Add Plugin
Add the module name in your modules_statuses.json file. The file is located in the core directory of the script.

![modules_statuses](https://docs.xgenious.com/wp-content/uploads/2023/03/image-11.png)

In the modules_statuses.json file
```sh
{
    "SSLCommerzPaymentGateway": true
}
```

modules_statuses.json file looks like this

![modules_statuses](https://docs.xgenious.com/wp-content/uploads/2023/03/image-12.png)


## Installation

You can easily set up the project by following the steps below. In that case, `Docker` and `Docker Compose` are required.

1. Clone the repo
   ```sh
   git clone git@github.com:farjanul/api-gateway.git
   ```
   and

   ```sh
   git clone git@github.com:farjanul/business-service.git
   ```
   
2. Create the `.env` file copying from `.env.example` and update these values for both projects.
3. Run the project.
    ```sh
    docker-compose up --build -d
    ```

## Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

## Developer
Follow me on - [@LinkedIn](https://www.linkedin.com/in/farjanuln/)

😊 Happy Coding 😊
