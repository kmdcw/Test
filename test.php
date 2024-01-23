function hidePaymentMethod($pluginName, $paymentMethod) {
    // Check if the plugin is active
    if (is_plugin_active($pluginName)) {
        // Get the active payment methods from the plugin
        $activePaymentMethods = get_active_payment_methods($pluginName);

        // Check if the payment method exists in the active payment methods
        if (in_array($paymentMethod, $activePaymentMethods)) {
            // Remove the payment method from the active payment methods
            $updatedPaymentMethods = array_diff($activePaymentMethods, [$paymentMethod]);

            // Save the updated payment methods in the plugin
            update_payment_methods($pluginName, $updatedPaymentMethods);

            // Display a success message
            echo "Payment method '$paymentMethod' has been hidden successfully.";
        } else {
            // Display an error message if the payment method is not found
            echo "Payment method '$paymentMethod' does not exist in the plugin.";
        }
    } else {
        // Display an error message if the plugin is not active
        echo "Plugin '$pluginName' is not active.";
    }
}
