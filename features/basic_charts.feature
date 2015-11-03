Feature:
    As the library's user
    I want to be able to create charts through the base drawing class
    Using the factory service

    Scenario: Creating a spline chart
        Given I have an empty data object
        And I create a new image object with it
        And I set the data for "spline" chart
        When I render and stroke the chart
        Then I should see a new image in output folder
        And there should be a "Content-type: image/png" header set in the response
