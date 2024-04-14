# Pizza House - Kitchen Domain Prototype

This is a prototype implementation of the Kitchen domain for the Pizza House application, developed using the Symfony framework.

## Overview

The Kitchen domain is responsible for the core functionality related to pizza making, including:

- Preparing pizzas based on customer orders
- Managing the inventory of ingredients
- Maintaining recipes and kitchen equipment
- Coordinating with the kitchen staff

This prototype focuses on implementing a fully functional Kitchen domain, including the following key components:

- Domain model (Aggregate Roots, Entities, Value Objects)
- Events and message handlers
- Repositories for data persistence
- Application services for coordinating the domain logic

## Domain Model

The main Aggregate Roots in the Kitchen domain are:

1. **Pizza**
   - `Pizza` entity
   - `Recipe` entity
   - `OrderItem` entity
   - `PizzaSize` value object
   - `PizzaPrice` value object

2. **Inventory**
   - `InventoryItem` entity
   - `QuantityUnit` value object
   - `ExpirationDate` value object

3. **KitchenEvent**
   - `KitchenEvent` entity
   - `EventType` value object
   - `EventDate` value object

These Aggregate Roots encapsulate the relevant entities and value objects, ensuring the integrity of the domain model.

## Events and Message Handlers

The prototype includes the following events and message handlers:

1. `PizzaCreatedEvent`
   - Triggered when a new `Pizza` is created
   - Handled by the `PizzaCreatedEventHandler` to update the Inventory

2. `InventoryUpdatedEvent`
   - Triggered when the Inventory is updated
   - Handled by the `InventoryUpdatedEventHandler` to notify other domains (e.g., Procurement)

These events and message handlers help maintain the consistency of the domain model and enable communication between different domains.

## Repositories

The prototype includes the following repositories:

1. `PizzaRepository`
   - Responsible for CRUD operations on the `Pizza` aggregate

2. `InventoryRepository`
   - Responsible for CRUD operations on the `Inventory` aggregate

3. `KitchenEventRepository`
   - Responsible for CRUD operations on the `KitchenEvent` aggregate

These repositories abstract the data persistence layer and provide a consistent interface for interacting with the domain model.

## Application Services

The prototype includes the following application services:

1. `PizzaService`
   - Handles the creation and management of `Pizza` entities
   - Triggers the `PizzaCreatedEvent` when a new pizza is created

2. `InventoryService`
   - Manages the Inventory, including adjusting stock levels and triggering reorders

3. `KitchenEventService`
   - Handles the creation and management of `KitchenEvent` entities

These application services coordinate the domain logic and ensure that the business rules are properly enforced.

## Getting Started

To set up the Kitchen domain prototype, follow these steps:

1. Clone the repository: `git clone https://github.com/duaneandrea/pizza-house.git`
2. Install the dependencies: `composer install`
3. Set up the database: `php bin/console doctrine:database:create`
4. Run the migrations: `php bin/console doctrine:migrations:migrate`
5. Start the development server: `symfony server:start`

The application will be available at `http://localhost:8000`.

## Next Steps

This prototype focuses on the Kitchen domain and provides a solid foundation for further development. The next steps could include:

- Implementing the other domains (e.g., Storage, RestaurantRoom, Personnel, Procurement, SalesAndPromotion)
- Integrating the domains through events and message queues
- Developing the user interface and API endpoints
- Adding authentication and authorization
- Implementing tests and CI/CD pipelines
