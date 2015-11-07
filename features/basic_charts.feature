Feature: Creating basic charts
    As the library's user
    I want to be able to create charts through the base drawing class
    Using the factory service

    Scenario: Creating a spline chart
        Given I render and stroke the chart of type "spline"
        Then I should see a new file "example.png" in output folder
        And there should be a "Content-type" header with value "image/png" set in the response
